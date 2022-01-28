// App
const Flow = function () {
    let $palette, $contextmenu, $container, $stage, $layer, $targets, $connectors, $data, $canvas;

    let width = window.innerWidth;
    let height = window.innerHeight;


    const SCALE = 1.03;

    const init = function () {
        $contextmenu = document.getElementById('flow-contextmenu');
        $palette = document.getElementById('flow-palette');
        $container = document.getElementById('flow-container');

        // $stage = new Konva.Stage({
        //     container: 'flow-container',
        //     width: width + PADDING * 2,
        //     height: height + PADDING * 2,
        //     draggable: true,
        // });

        // $layer = new Konva.Layer();
        // $stage.add($layer);

        // $scrollContainer.addEventListener('scroll', scroll);

        // $stage.on('mouseover', function () {
        //     document.body.style.cursor = 'grab';
        // });
        // var json = $stage.toJSON();
        //
        // console.log(json);


        // $targets = [
        //     {
        //         id: 'trigger',
        //         x: $stage.width() * Math.random(),
        //         y: $stage.height() * Math.random(),
        //     },
        //     {
        //         id: 'end',
        //         x: $stage.width() * Math.random(),
        //         y: $stage.height() * Math.random(),
        //     }
        // ];
        //
        // $connectors = [
        //     {
        //         id: 'trigger1',
        //         from: 'trigger',
        //         to: 'end',
        //     }
        // ];




    };

    const contextmenu = function () {
        let currentShape;

        document.getElementById('pulse-button').addEventListener('click', () => {
            currentShape.to({
                scaleX: 2,
                scaleY: 2,
                onFinish: () => {
                    currentShape.to({scaleX: 1, scaleY: 1});
                },
            });
        });

        document.getElementById('delete-button').addEventListener('click', () => {
            currentShape.destroy();
            $layer.draw();
        });

        window.addEventListener('click', () => {
            $contextmenu.style.display = 'none';
        });

        $stage.on('contextmenu', function (e) {
            // prevent default behavior
            e.evt.preventDefault();

            if (e.target === $stage) {
                return;
            }

            currentShape = e.target;
            // show menu
            $contextmenu.style.display = 'initial';
            $contextmenu.style.position = 'fixed';

            let containerRect = $stage.container().getBoundingClientRect();

            $contextmenu.style.top = containerRect.top + $stage.getPointerPosition().y + 4 + 'px';
            $contextmenu.style.left = containerRect.left + $stage.getPointerPosition().x + 4 + 'px';
        });
    };

    const scroll = function () {
        let dx = $scrollContainer.scrollLeft - PADDING;
        let dy = $scrollContainer.scrollTop - PADDING;

        $stage.container().style.transform = 'translate(' + dx + 'px, ' + dy + 'px)';

        $stage.x(-dx);
        $stage.y(-dy);

        if ($contextmenu.style.display !== 'none') {
            $contextmenu.style.display = 'none';
        }

        $stage.batchDraw();
    };

    const createWidget = function (type= null) {

        // let position = $stage.getPointerPosition();


        const text = new Konva.Text({
            text: "Trigger",
            fontSize: 21,
            fontWeight: 'bold',
            fontFamily: 'Calibri',
            fill: '#F22F46',
            width: 300,
            padding: 20,
            align: 'center',
        });

        // text.position(position);

        const widget = new Konva.Rect({
            width: 374,
            height: 90,
            fill: '#FFF',
            strokeWidth: 4,
            cornerRadius: 2,
            opacity: 0.9,
            draggable: true
        });
        // widget.position(position);
        //
        // $layer.add(widget);
        // $layer.add(text);

        var group = new Konva.Group();

        group.add(widget,text);
        // group.add(text);

        group.position($stage.getPointerPosition());

        $layer.add(group);
        $layer.draw();
    }

    const load = function (data) {
        $stage = Konva.Node.create(data, $container);
    }

    const save = function () {
        // $stage.isModified = false;

        // return $data.value = JSON.stringify(JSON.parse($stage.toJSON()),null,'    ');
        return $stage.toJSON();
    }

    const wheel = function () {
        $stage.on('wheel', (e) => {
            e.evt.preventDefault();

            const oldScale = $stage.scaleX();

            const pointer = $stage.getPointerPosition();

            const mousePointTo = {
                x: (pointer.x - $stage.x()) / oldScale,
                y: (pointer.y - $stage.y()) / oldScale,
            };

            const newScale = e.evt.deltaY > 0 ? oldScale * SCALE : oldScale / SCALE;

            $stage.scale({ x: newScale, y: newScale });

            const newPos = {
                x: pointer.x - mousePointTo.x * newScale,
                y: pointer.y - mousePointTo.y * newScale,
            };

            $stage.position(newPos);
            $stage.batchDraw();
        });
    };

    const palette = function () {
        let itemURL = '';

        $palette.addEventListener('dragstart', function (e) {
            itemURL = e.target.src;
        });

        const con = $stage.container();

        con.addEventListener('dragover', function (e) {
            e.preventDefault(); // !important
        });


        con.addEventListener('drop', function (e) {
            e.preventDefault();

            $stage.setPointersPositions(e);

            createWidget();
        });
    }

    const loadObjects = function () {
        $targets.forEach((target) => {
            let node = new Konva.Circle({
                id: target.id,
                fill: Konva.Util.getRandomColor(),
                radius: 20 + Math.random() * 20,
                shadowBlur: 10,
                draggable: true,
            });

            $layer.add(node);

            node.on('dragmove', () => {
                target.x = node.x();
                target.y = node.y();
                updateObjects();
            });
        });

        $connectors.forEach((connect) => {
            let line = new Konva.Arrow({
                stroke: 'black',
                id: connect.id,
                fill: 'black',
            });

            $layer.add(line);
        });
    }

    const updateObjects = function () {

        function getConnectorPoints(from, to) {
            const dx = to.x - from.x;
            const dy = to.y - from.y;
            let angle = Math.atan2(-dy, dx);

            const radius = 40;

            return [
                from.x + -radius * Math.cos(angle + Math.PI),
                from.y + radius * Math.sin(angle + Math.PI),
                to.x + -radius * Math.cos(angle),
                to.y + radius * Math.sin(angle),
            ];
        }

        $targets.forEach((target) => {
            let node = $layer.findOne('#' + target.id);
            node.x(target.x);
            node.y(target.y);
        });

        $connectors.forEach((connect) => {
            let line = $layer.findOne('#' + connect.id);
            let fromNode = $layer.findOne('#' + connect.from);
            let toNode = $layer.findOne('#' + connect.to);

            const points = getConnectorPoints(
                fromNode.position(),
                toNode.position()
            );

            line.points(points);
        });

        $layer.batchDraw();
    }


    const updateSatage = function () {

        function getConnectorPoints(from, to) {
            const dx = to.x - from.x;
            const dy = to.y - from.y;
            let angle = Math.atan2(-dy, dx);

            const radius = 40;

            return [
                from.x + -radius * Math.cos(angle + Math.PI),
                from.y + radius * Math.sin(angle + Math.PI),
                to.x + -radius * Math.cos(angle),
                to.y + radius * Math.sin(angle),
            ];
        }

        $targets.forEach((target) => {
            let node = $layer.findOne('#' + target.id);
            node.x(target.x);
            node.y(target.y);
        });

        $connectors.forEach((connect) => {
            let line = $layer.findOne('#' + connect.id);
            let fromNode = $layer.findOne('#' + connect.from);
            let toNode = $layer.findOne('#' + connect.to);

            const points = getConnectorPoints(
                fromNode.position(),
                toNode.position()
            );

            line.points(points);
        });

        $layer.batchDraw();
    }


    return {
        init: function ($func, data = null) {
            switch ($func) {
                case 'init':
                    init();
                    break;
                case 'scroll':
                    scroll();
                    break;
                    case 'wheel':
                    wheel();
                    break;
                case 'palette':
                    palette();
                    break;
                case 'contextmenu':
                    contextmenu();
                    break;
                case 'load':
                    load(data);
                    break;
                // case 'loadObjects':
                //     loadObjects();
                //     break;
                case 'updateObjects':
                    updateObjects();
                    break;
                default:
                    init();
                    // scroll();
                    // wheel();
                    // palette();
                    // contextmenu();
                    // loadObjects();
                    // updateObjects();
            }
        },
        vendor: function ($vendor) {
            switch ($vendor) {
                default:
                    return false;
            }
        },
        vendors: function ($vendors) {
            if ($vendors instanceof Array) {
                for (let $index in $vendors) {
                    Flow.vendor($vendors[$index]);
                }
            } else {
                Flow.vendor($vendors);
            }
        }
    };
}();





jQuery(function () {
    Flow.init();


    const stg = import('/stage.js');

    stg.then((data) => {
        Flow.init('load', data.stage);
        // console.log( data.stage)
    });

    // Flow.init('load', data);
});


