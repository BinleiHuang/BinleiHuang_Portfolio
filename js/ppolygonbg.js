jQuery(function($){

    function isCanvasSupported(){
        var elem = document.createElement('canvas');
        return !!(elem.getContext && elem.getContext('2d'));
    }

    if (!isCanvasSupported()){
        $('body').css({ "background": 'url('+ WarpThemePath + "/images/background/polygon/polygon.jpg" +') no-repeat fixed 50% 50%', "background-size":"cover" });
        return;
    }

    $('body').prepend('<div id="animatedbg" style="position:fixed; top:0; left:0; right:0; bottom:0; z-index:-1;"></div>');

    //------------------------------
    // Mesh Properties
    //------------------------------
    var MESH = {
        width: 1.2,
        height: 1.2,
        depth: 10,
        segments: 8,
        slices: 8,
        xRange: 0.3,
        yRange: 0.3,
        zRange: 0.3,
        ambient: '#020203',
        diffuse: '#56585C',
        speed: 0.0005
    };

    //------------------------------
    // Light Properties
    //------------------------------
    var LIGHT = {
        count: 2,
        xyScalar: 0.8,
        zOffset: 200,
        ambient: '#0f0f0f',
        diffuse: '#4A4C4F',
        speed: 0.0008,
        gravity: 600,
        dampening: 0.8,
        minLimit: 0,
        maxLimit: 15,
        minDistance: 10,
        maxDistance: 400,
        bounds: FSS.Vector3.create(),
        step: FSS.Vector3.create(
          Math.randomInRange(0.6, 1.0),
          Math.randomInRange(0.6, 1.0),
          Math.randomInRange(0.6, 1.0)
        )
    };

    //------------------------------
    // Global Properties
    //------------------------------
    var now, start  = Date.now();
    var center      = FSS.Vector3.create();
    var attractor   = FSS.Vector3.create();
    var container   = document.getElementById('animatedbg');
    var renderer    = new FSS.CanvasRenderer();
    var scene, mesh, geometry, material;

    //------------------------------
    // Methods
    //------------------------------
    function initialise() {
        renderer.setSize(container.offsetWidth, container.offsetHeight);
        container.appendChild(renderer.element);
        scene = new FSS.Scene();
        createMesh();
        createLights();
        window.addEventListener('resize', onWindowResize);
        resize(container.offsetWidth, container.offsetHeight);
        animate();
    }

    function createMesh() {
        scene.remove(mesh);
        renderer.clear();
        geometry = new FSS.Plane(MESH.width * renderer.width, MESH.height * renderer.height, MESH.segments, MESH.slices);
        material = new FSS.Material(MESH.ambient, MESH.diffuse);
        mesh = new FSS.Mesh(geometry, material);
        scene.add(mesh);

        // Augment vertices for animation
        var v, vertex;
        for (v = geometry.vertices.length - 1; v >= 0; v--) {
            vertex = geometry.vertices[v];
            vertex.anchor = FSS.Vector3.clone(vertex.position);
            vertex.step = FSS.Vector3.create( Math.randomInRange(0.2, 1.0), Math.randomInRange(0.2, 1.0), Math.randomInRange(0.2, 1.0));
            vertex.time = Math.randomInRange(0, Math.PIM2);
        }
    }

    function createLights() {
        var l, light;
        for (l = scene.lights.length - 1; l >= 0; l--) {
            light = scene.lights[l];
            scene.remove(light);
        }
        renderer.clear();
        for (l = 0; l < LIGHT.count; l++) {
            light = new FSS.Light(LIGHT.ambient, LIGHT.diffuse);
            light.ambientHex = light.ambient.format();
            light.diffuseHex = light.diffuse.format();
            scene.add(light);

            // Augment light for animation
            light.mass = Math.randomInRange(0.5, 1);
            light.velocity = FSS.Vector3.create();
            light.acceleration = FSS.Vector3.create();
            light.force = FSS.Vector3.create();
        }
    }

    function resize(width, height) {
        renderer.setSize(width, height);
        FSS.Vector3.set(center, renderer.halfWidth, renderer.halfHeight);
        createMesh();
    }

    function animate() {
        now = Date.now() - start;
        update();
        renderer.render(scene);
        requestAnimationFrame(animate);
    }

    function update() {
        var ox, oy, oz, l, light, v, vertex, offset = MESH.depth/2;

        // Update Bounds
        FSS.Vector3.copy(LIGHT.bounds, center);
        FSS.Vector3.multiplyScalar(LIGHT.bounds, LIGHT.xyScalar);

        // Update Attractor
        FSS.Vector3.setZ(attractor, LIGHT.zOffset);

        // Overwrite the Attractor position
        ox = Math.sin(LIGHT.step[0] * now * LIGHT.speed);
        oy = Math.cos(LIGHT.step[1] * now * LIGHT.speed);
        FSS.Vector3.set(attractor, LIGHT.bounds[0]*ox, LIGHT.bounds[1]*oy, LIGHT.zOffset);

        // Animate Lights
        for (l = scene.lights.length - 1; l >= 0; l--) {
            light = scene.lights[l];

            // Reset the z position of the light
            FSS.Vector3.setZ(light.position, LIGHT.zOffset);

            // Calculate the force Luke!
            var D = Math.clamp(FSS.Vector3.distanceSquared(light.position, attractor), LIGHT.minDistance, LIGHT.maxDistance);
            var F = LIGHT.gravity * light.mass / D;
            FSS.Vector3.subtractVectors(light.force, attractor, light.position);
            FSS.Vector3.normalise(light.force);
            FSS.Vector3.multiplyScalar(light.force, F);

            // Update the light position
            FSS.Vector3.set(light.acceleration);
            FSS.Vector3.add(light.acceleration, light.force);
            FSS.Vector3.add(light.velocity, light.acceleration);
            FSS.Vector3.multiplyScalar(light.velocity, LIGHT.dampening);
            FSS.Vector3.limit(light.velocity, LIGHT.minLimit, LIGHT.maxLimit);
            FSS.Vector3.add(light.position, light.velocity);
        }

        // Animate Vertices
        for (v = geometry.vertices.length - 1; v >= 0; v--) {
            vertex = geometry.vertices[v];
            ox = Math.sin(vertex.time + vertex.step[0] * now * MESH.speed);
            oy = Math.cos(vertex.time + vertex.step[1] * now * MESH.speed);
            oz = Math.sin(vertex.time + vertex.step[2] * now * MESH.speed);
            FSS.Vector3.set(vertex.position, MESH.xRange*geometry.segmentWidth*ox, MESH.yRange*geometry.sliceHeight*oy, MESH.zRange*offset*oz - offset);
            FSS.Vector3.add(vertex.position, vertex.anchor);
        }

        geometry.dirty = true;

    }

    function onWindowResize(event) {
        resize(container.offsetWidth, container.offsetHeight);
        renderer.render(scene);
    }

    initialise();

});
