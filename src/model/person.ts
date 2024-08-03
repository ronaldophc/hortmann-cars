import Helper from "../utils/helper";
import { Entity } from "./entity";

export default class Person implements Entity {
    
    private name: string = "";
    public id: number = Helper.generateId();

    constructor(name: string) {
        this.name = name;
    }

    public getName(): string {
        return this.name;
    }
    
    public setName(n: string): void {
        this.name = n;
    }

    public getId(): number {
        return this.id;
    }

    public describe(): string {
        return "Nome: " + this.name;
    }
}