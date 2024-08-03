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

    public setBalance(comission: number): void;
    public setBalance(comission: string): void;
    public setBalance(comission: number | string): void {
        if (typeof comission === "number") {
            this.comission = comission;
        } else if (typeof comission === "string") {
            this.comission = parseFloat(comission);
        }
    }

    public describe(): string {
        return super.describe() + ", Comissão: " + this.comission;
    }
}