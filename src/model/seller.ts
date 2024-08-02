import Person from "./person";

export default class Seller extends Person {
    comission: number;

    constructor(name: string) {
        super(name);
        this.comission = 0;
    }

    public getComission(): number {
        return this.comission;
    }

    public setComission(comission: number): void {
        this.comission = comission;
    }
}