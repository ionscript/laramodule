import Config from "./core/Config.js";

class Application
{
    #services = {
        'config': Config
    };

    static #instance;

    constructor ($config = null) {
        // this.#services.config = new Config($config);
    }

    /** SINGLETON **/
    static get instance() {
        if(!this.#instance) {
            this.#instance = new this;
        }

        return this.#instance;
    }

    get ($key) {
        // console.log(this.#services[$key] instanceof Function);
        // console.log(typeof this.#services[$key] === 'function') ;
        // console.log(typeof this.#services[$key] === 'object') ;

        if(!this.#services[$key]) {
            throw 'Service "' +$key+ '" not found';
        }

        if(typeof this.#services[$key] === 'function') {
            this.#services[$key] = new this.#services[$key];
        }

        return this.#services[$key];
    }

    set ($key, $value) {
        this.#services[$key] = $value;
        return this;
    }

    static init($config) {
        return new this($config);
    }

    run() {
        return this;
    }

    bootstrap() {

    }
}


const  app = Application.init().run();
const  app3 = Application.init().run();
const  app4 = Application.init().run();

const  app2 = Application.instance;
const  app5 = Application.instance;
const  app6 = Application.instance;




// console.log(app);



console.log(app);
//
console.log(app2);
