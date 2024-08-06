import Person from "./person";

export default class Seller extends Person {
    comission: number;

    constructor(name: string) {
        super(name);
        this.comission = 0;
    }

    public getBalance(): number {
        return this.comission;
    }

    public setBalance(comission: number): void {
        this.comission = comission;
    }

    public describe(): string {
        return super.describe() + ", Comissão: " + this.comission;
    }
}