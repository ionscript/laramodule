// App
// const Flow = function () {
//     let $palette, $contextmenu, $scrollContainer, $stage, $layer, $targets, $connectors;
//
//     let width = window.innerWidth;
//     let height = window.innerHeight;
//
//     const PADDING = 50;
//
//     const init = function () {
//         $contextmenu = document.getElementById('flow-contextmenu');
//         $palette = document.getElementById('flow-palette');
//         $scrollContainer = document.getElementById('flow-scroll-container');
//
//         $stage = new Konva.Stage({
//             container: 'flow-container',
//             width: width + PADDING * 2,
//             height: height + PADDING * 2,
//             draggable: true,
//         });
//
//         $layer = new Konva.Layer();
//         $stage.add($layer);
//
//         $scrollContainer.addEventListener('scroll', scroll);
//
//         $targets = [
//             {
//                 id: 'trigger',
//                 x: $stage.width() * Math.random(),
//                 y: $stage.height() * Math.random(),
//             },
//             {
//                 id: 'end',
//                 x: $stage.width() * Math.random(),
//                 y: $stage.height() * Math.random(),
//             }
//         ];
//
//         $connectors = [
//             {
//                 id: 'trigger1',
//                 from: 'trigger',
//                 to: 'end',
//             }
//         ];
//
//     };
//
//     const contextmenu = function () {
//         let currentShape;
//
//         document.getElementById('pulse-button').addEventListener('click', () => {
//             currentShape.to({
//                 scaleX: 2,
//                 scaleY: 2,
//                 onFinish: () => {
//                     currentShape.to({scaleX: 1, scaleY: 1});
//                 },
//             });
//         });
//
//         document.getElementById('delete-button').addEventListener('click', () => {
//             currentShape.destroy();
//             $layer.draw();
//         });
//
//         window.addEventListener('click', () => {
//             $contextmenu.style.display = 'none';
//         });
//
//         $stage.on('contextmenu', function (e) {
//             // prevent default behavior
//             e.evt.preventDefault();
//
//             if (e.target === $stage) {
//                 return;
//             }
//
//             currentShape = e.target;
//             // show menu
//             $contextmenu.style.display = 'initial';
//             $contextmenu.style.position = 'fixed';
//
//             let containerRect = $stage.container().getBoundingClientRect();
//
//             $contextmenu.style.top = containerRect.top + $stage.getPointerPosition().y + 4 + 'px';
//             $contextmenu.style.left = containerRect.left + $stage.getPointerPosition().x + 4 + 'px';
//         });
//     };
//
//     const scroll = function () {
//         let dx = $scrollContainer.scrollLeft - PADDING;
//         let dy = $scrollContainer.scrollTop - PADDING;
//
//         $stage.container().style.transform = 'translate(' + dx + 'px, ' + dy + 'px)';
//
//         $stage.x(-dx);
//         $stage.y(-dy);
//
//         if ($contextmenu.style.display !== 'none') {
//             $contextmenu.style.display = 'none';
//         }
//
//         $stage.batchDraw();
//     };
//
//     const palette = function () {
//         let itemURL = '';
//
//         $palette.addEventListener('dragstart', function (e) {
//             itemURL = e.target.src;
//         });
//
//         const con = $stage.container();
//
//         con.addEventListener('dragover', function (e) {
//             e.preventDefault(); // !important
//         });
//
//
//         con.addEventListener('drop', function (e) {
//             e.preventDefault();
//
//             $stage.setPointersPositions(e);
//
//             Konva.Image.fromURL(itemURL, function (image) {
//                 $layer.add(image);
//
//                 image.position($stage.getPointerPosition());
//                 image.draggable(true);
//
//                 $layer.draw();
//             });
//         });
//     }
//
//     const loadObjects = function () {
//         $targets.forEach((target) => {
//             let node = new Konva.Circle({
//                 id: target.id,
//                 fill: Konva.Util.getRandomColor(),
//                 radius: 20 + Math.random() * 20,
//                 shadowBlur: 10,
//                 draggable: true,
//             });
//
//             $layer.add(node);
//
//             node.on('dragmove', () => {
//                 target.x = node.x();
//                 target.y = node.y();
//                 updateObjects();
//             });
//         });
//
//         $connectors.forEach((connect) => {
//             let line = new Konva.Arrow({
//                 stroke: 'black',
//                 id: connect.id,
//                 fill: 'black',
//             });
//
//             $layer.add(line);
//         });
//     }
//
//     const updateObjects = function () {
//
//         function getConnectorPoints(from, to) {
//             const dx = to.x - from.x;
//             const dy = to.y - from.y;
//             let angle = Math.atan2(-dy, dx);
//
//             const radius = 40;
//
//             return [
//                 from.x + -radius * Math.cos(angle + Math.PI),
//                 from.y + radius * Math.sin(angle + Math.PI),
//                 to.x + -radius * Math.cos(angle),
//                 to.y + radius * Math.sin(angle),
//             ];
//         }
//
//         $targets.forEach((target) => {
//             let node = $layer.findOne('#' + target.id);
//             node.x(target.x);
//             node.y(target.y);
//         });
//
//         $connectors.forEach((connect) => {
//             let line = $layer.findOne('#' + connect.id);
//             let fromNode = $layer.findOne('#' + connect.from);
//             let toNode = $layer.findOne('#' + connect.to);
//
//             const points = getConnectorPoints(
//                 fromNode.position(),
//                 toNode.position()
//             );
//
//             line.points(points);
//         });
//
//         $layer.batchDraw();
//     }
//
//     const loader = function ($mode) {
//         let $pageLoader = jQuery('#loader');
//
//         if ($mode === 'show') {
//             if ($pageLoader.length) {
//                 $pageLoader.fadeIn(250);
//             } else {
//                 $body.prepend('<div id="page-loader"></div>');
//             }
//         } else if ($mode === 'hide') {
//             if ($pageLoader.length) {
//                 $pageLoader.fadeOut(250);
//             }
//         }
//
//         return false;
//     };
//
//     return {
//         init: function ($func) {
//             switch ($func) {
//                 case 'init':
//                     init();
//                     break;
//                 case 'scroll':
//                     scroll();
//                     break;
//                 case 'palette':
//                     palette();
//                     break;
//                 case 'contextmenu':
//                     contextmenu();
//                     break;
//                 case 'loadObjects':
//                     loadObjects();
//                     break;
//                 case 'updateObjects':
//                     updateObjects();
//                     break;
//                 case 'loader':
//                     loader('hide');
//                     break;
//                 default:
//                     init();
//                     scroll();
//                     palette();
//                     contextmenu();
//                     loadObjects();
//                     updateObjects();
//                     loader('hide');
//             }
//         },
//         loader: function ($mode) {
//             loader($mode);
//         },
//         vendor: function ($vendor) {
//             switch ($vendor) {
//                 default:
//                     return false;
//             }
//         },
//         vendors: function ($vendors) {
//             if ($vendors instanceof Array) {
//                 for (let $index in $vendors) {
//                     Flow.vendor($vendors[$index]);
//                 }
//             } else {
//                 Flow.vendor($vendors);
//             }
//         }
//     };
// }();
//
// jQuery(function () {
//     Flow.init();
// });


class Flow
{
    constructor() {

    }

}

class Config
{
    #config = {};

    constructor($config) {
        this.#config = $config;
    }

    get ($key) {
        return this.#config.$key ?? throw 'Config "' + $key + '" not found';
    }

    set ($key, $value) {
        this.#config.$key = $value;

        return this;
    }
}

class Url
{
    constructor() {

    }

}

class Application
{
   #services = {};

    constructor ($config) {
        this.#services.config = new Config($config);
    }

    get ($key) {
        if(!this.#services.$key) {
            throw 'Service "' +$key+ '" not found';
        }
        return this.#services.$key;
    }

}