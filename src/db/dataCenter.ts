import Buyer from "../model/buyer";
import Car from "../model/car";
import Motorcycle from "../model/motorcycle";
import PersonalError from "../model/personalError";
import Sale from "../model/sale";
import Seller from "../model/seller";
import Truck from "../model/truck";
import Vehicle from "../model/vehicle";

export default class DataCenter {
    private static instance: DataCenter;
    private cars: Car[];
    private motorcycles: Motorcycle[];
    private trucks: Truck[];
    private buyers: Buyer[];
    private sellers: Seller[];
    private sales: Sale[];

    private constructor() {
        this.cars = [];
        this.motorcycles = [];
        this.buyers = [];
        this.sellers = [];
        this.sales = [];
        this.trucks = [];
    }

    public static getInstance(): DataCenter {
        if (!DataCenter.instance) {
            DataCenter.instance = new DataCenter();
        }
        return DataCenter.instance;
    }
    
    public addNewVehicle<T extends Vehicle>(vehicle: T): void {
        if (vehicle instanceof Car) {
            this.cars.push(vehicle as Car);
            return;
        }
        if(vehicle instanceof Motorcycle) {
            this.motorcycles.push(vehicle as Motorcycle);
            return;
        }
        if(vehicle instanceof Truck) {
            this.trucks.push(vehicle as Truck);
            return;
        }
    }

    public getAllVehicles(): Vehicle[] {
        return [...this.cars, ...this.motorcycles, ...this.trucks];
    }

    public getCars(): Car[] {
        return this.cars;
    }

    public getVehiclebyId(id: number): Car | Motorcycle | Truck {
        if(this.cars.find(cars => cars.getId() === id)) {
            return this.cars.find(cars => cars.getId() === id) as Car;
        }
        if(this.motorcycles.find(motorcycles => motorcycles.getId() === id)) {
            return this.motorcycles.find(motorcycles => motorcycles.getId() === id) as Motorcycle;
        }
        if(this.trucks.find(trucks => trucks.getId() === id)) {
            return this.trucks.find(trucks => trucks.getId() === id) as Truck;
        }
        throw new PersonalError("Vehicle not found");
    }

    public getMotorcycles(): Motorcycle[] {
        return this.motorcycles;
    }

    public getTrucks(): Truck[] {
        return this.trucks;
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

    public getBuyerById(id: number): Buyer {
        return this.buyers.find(buyer => buyer.getId() === id) as Buyer;
    }

    public getSellerById(id: number): Seller {
        return this.sellers.find(seller => seller.getId() === id) as Seller;
    }

    public getSaleById(id: number): Sale {
        return this.sales.find(sale => sale.getId() === id) as Sale;
    }
}