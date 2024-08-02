import Person from "./person";

export default class Buyer extends Person {
    money: number;

    constructor(name: string, money: number) {
        super(name);
        this.money = money;
    }

    public getMoney(): number {
        return this.money;
    }

    public setMoney(money: number): void {
        this.money = money;
    }
}