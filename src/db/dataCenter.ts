import Buyer from "../model/buyer";
import Car from "../model/car";
import Seller from "../model/seller";

export default class DataCenter {
    private cars: Car[];
    private buyers: Buyer[];
    private sellers: Seller[];

    constructor() {
        this.cars = [];
        this.buyers = [];
        this.sellers = [];
    }

    public addNewCar(car: Car): void {
        this.cars.push(car);
    }

    public getCars(): Car[] {
        return this.cars;
    }

    public addNewBuyer(buyer: Buyer): void {
        this.buyers.push(buyer);
    }

    public getBuyers(): Buyer[] {
        return this.buyers;
    }

    public addNewSeller(seller: Seller): void {
        this.sellers.push(seller);
    }

    public getSellers(): Seller[] {
        return this.sellers;
    }
}