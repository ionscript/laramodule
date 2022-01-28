export default class Config
{
    #config = {};

    constructor($config) {
        this.#config = $config;
    }

    get ($key) {
        return this.#config.$key ?? null;
    }

    set ($key, $value) {
        this.#config.$key = $value;

        return this;
    }
}
