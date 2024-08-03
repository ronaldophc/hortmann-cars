import Buyer from "../model/buyer";
import Sale from "../model/sale";
import Seller from "../model/seller";
import Vehicle from "../model/vehicle";

export default class DataCenter {
    private static instance: DataCenter;
    private vehicles: Vehicle[];
    private buyers: Buyer[];
    private sellers: Seller[];
    private sales: Sale[];

    constructor() {
        this.vehicles = [];
        this.buyers = [];
        this.sellers = [];
        this.sales = [];
    }

    public static getInstance(): DataCenter {
        if (!DataCenter.instance) {
            DataCenter.instance = new DataCenter();
        }
        return DataCenter.instance;
    }

    public printAll(): void {
        console.log(this.vehicles);
        console.log(this.buyers);
        console.log(this.sellers);
        console.log(this.sales);
    }

    public addNewVehicle(vehicle: Vehicle): void {
        this.vehicles.push(vehicle);
    }

    public getVehicles(): Vehicle[] {
        return this.vehicles;
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

    public addNewSale(sale: Sale): void {
        this.sales.push(sale);
    }

    public getSales(): Sale[] {
        return this.sales;
    }

    public getVehicleById(id: number): Vehicle {
        return this.vehicles.find(vehicle => vehicle.getId() === id) as Vehicle;
    }

    public getBuyerById(id: number): Buyer {
        return this.buyers.find(buyer => buyer.getId() === id) as Buyer;
    }

    public getSellerById(id: number): Seller {
        return this.sellers.find(seller => seller.getId() === id) as Seller;
    }
}