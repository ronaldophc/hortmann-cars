import DataCenter from "../db/dataCenter";
import Car from "../model/car";
import Motorcycle from "../model/motorcycle";
import Truck from "../model/truck";
import Vehicle from "../model/vehicle";

export default class VehiclesController {
    private static datacenter: DataCenter = DataCenter.getInstance();

    public static createNewCar(brand: string, model: string, year: number, value: number, mileage?: number): Car {
        return new Car(brand, model, year, value, mileage);
    }

    public static createNewTruck(brand: string, model: string, year: number, value: number, mileage?: number): Truck {
        return new Truck(brand, model, year, value, mileage);
    }

    public static createNewMotorcycle(brand: string, model: string, year: number, value: number, mileage?: number): Motorcycle {
        return new Motorcycle(brand, model, year, value, mileage);
    }

    public static registerNewVehicle<T extends Vehicle>(vehicle: T): void {
        this.datacenter.addNewVehicle(vehicle);
    }

    public static listAllCars(): Car[] {
        return this.datacenter.getCars();
    }

    public static listAllVehicles(): Car[] | Truck[] | Motorcycle[] {
        return this.datacenter.getAllVehicles();
    }

    public static getVehicleById(id: number): Car | Truck | Motorcycle {
        try {
            return this.datacenter.getVehiclebyId(id);
        } catch (error: any) {
            return error;
        }
    }

    public static listAllMotorcycles(): Motorcycle[] {
        return this.datacenter.getMotorcycles();
    }

    public static listAllTrucks(): Truck[] {
        return this.datacenter.getTrucks();
    }

}
