import Buyer from "../model/buyer";
import Helper from "../utils/helper";
import Seller from "./seller";
import Vehicle from "./vehicle";

export default class Sale {
    private saleDate: Date;
    private saleValue: number;
    private seller: Seller;
    private comission: number;
    private vehicle: Vehicle;
    private buyer: Buyer;
    public id: number = Helper.generateId();

    constructor(saleDate: Date, seller: Seller, vehicle: Vehicle, buyer: Buyer) {
        this.saleDate = saleDate;
        this.saleValue = vehicle.getValue();
        this.seller = seller;
        this.vehicle = vehicle;
        this.buyer = buyer;
        this.comission = 0;

        this.buyer.setBalance(this.buyer.getBalance() - this.saleValue);
        this.calculateComission();
    }

    private calculateComission(): void {
        this.comission = this.saleValue * 0.02;
        this.seller.setBalance(this.seller.getBalance() + this.comission);
    }

    public infoPurchase() {
        console.log(`Comprador: ${this.buyer.getName()}, comprou o carro: ${this.vehicle.getModel()}, ano: ${this.vehicle.getYear()}, pelo valor: R$${this.vehicle.getValue()}. Vendedor: ${this.seller.getName()} ganhou a comissao de R$${this.comission}`)
    }

    public getSaleDate(): Date {
        return this.saleDate;
    }

    public getSaleValue(): number {
        return this.saleValue;
    }

    public getSeller(): Seller {
        return this.seller;
    }

    public getComission(): number {
        return this.comission;
    }

    public getId(): number {
        return this.id;
    }
}