import Person from "./person";

export default class Buyer extends Person {
    money: number;

    constructor(name: string, money: number) {
        super(name);
        this.money = money;
    }

    public getBalance(): number {
        return this.money;
    }

    public setBalance(money: number): void {
        this.money = money;
    }

    public describe(): string {
        return super.describe() + ", Dinheiro: " + this.money;
    }
}