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

/** ABSTRACT CLASS **/

let calculatorMixin = Base => class extends Base {
    calc() { }
};

let randomizerMixin = Base => class extends Base {
    randomize() { }
};

class Foo { }
class Bar extends calculatorMixin(randomizerMixin(Foo)) { }



/** SUPERCLASS **/
class Cat {
    constructor(name) {
        this.name = name;
    }

    speak() {
        console.log(`${this.name} makes a noise.`);
    }
}

class Lion extends Cat {
    speak() {
        super.speak();
        console.log(`${this.name} roars.`);
    }
}

let l = new Lion('Fuzzy');
l.speak();
// Fuzzy makes a noise.
// Fuzzy roars.

/** SPECIES **/
class MyArray extends Array {
    // Overwrite species to the parent Array constructor
    static get [Symbol.species]() { return Array; }
}

let a = new MyArray(1,2,3);
let mapped = a.map(x => x * x);

console.log(mapped instanceof MyArray); // false
console.log(mapped instanceof Array);   // true





/** EXTENDS REGULAR OBJECTS **/
const Animal = {
    speak() {
        console.log(`${this.name} makes a noise.`);
    }
};

class Dog {
    constructor(name) {
        this.name = name;
    }
}

// If you do not do this you will get a TypeError when you invoke speak
Object.setPrototypeOf(Dog.prototype, Animal);

let d = new Dog('Mitzie');
d.speak(); // Mitzie makes a noise.


/** EXTENDS **/
class Animal {
    constructor(name) {
        this.name = name;
    }

    speak() {
        console.log(`${this.name} makes a noise.`);
    }
}

class Dog extends Animal {
    constructor(name) {
        super(name); // call the super class constructor and pass in the name parameter
    }

    speak() {
        console.log(`${this.name} barks.`);
    }
}

let d = new Dog('Mitzie');
d.speak(); // Mitzie barks.

/** PRIVATE FIELD **/
class Rectangle {
    #height = 0;
    #width;
    constructor(height, width) {
        this.#height = height;
        this.#width = width;
    }
}
/** PUBLIC FIELD **/
class Rectangle {
    height = 0;
    width;
    constructor(height, width) {
        this.height = height;
        this.width = width;
    }
}
/** DECLARATION **/
class Rectangle {
    constructor(height, width) {
        this.height = height;
        this.width = width;
    }
}
/** EXPRESSION **/
// unnamed
let Rectangle = class {
    constructor(height, width) {
        this.height = height;
        this.width = width;
    }
};
console.log(Rectangle.name);
// output: "Rectangle"

// named
let Rectangle = class Rectangle2 {
    constructor(height, width) {
        this.height = height;
        this.width = width;
    }
};
console.log(Rectangle.name);
// output: "Rectangle2"
/** PROTOTYPE METHODS **/
class Rectangle {
    constructor(height, width) {
        this.height = height;
        this.width = width;
    }
    // Getter
    get area() {
        return this.calcArea();
    }
    // Method
    calcArea() {
        return this.height * this.width;
    }
}

const square = new Rectangle(10, 10);

console.log(square.area); // 100

/** STATIC METHODS **/
class Point {
    constructor(x, y) {
        this.x = x;
        this.y = y;
    }

    static distance(a, b) {
        const dx = a.x - b.x;
        const dy = a.y - b.y;

        return Math.hypot(dx, dy);
    }
}

const p1 = new Point(5, 5);
const p2 = new Point(10, 10);
p1.distance; //undefined
p2.distance; //undefined

console.log(Point.distance(p1, p2)); // 7.0710678118654755

/** INSTANCE PROPERTIES **/
class Rectangle {
    constructor(height, width) {
        this.height = height;
        this.width = width;
    }
}