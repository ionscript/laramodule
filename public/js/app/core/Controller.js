class Controller
{
    #app;

    constructor($app) {
        this.#app = $app;
    }

    get ($key) {
        return this.#app.$key;
    }

    set ($key, $value) {
        this.#app.$key = $value;
        return this;
    }
}
