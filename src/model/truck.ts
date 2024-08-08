import Vehicle from "./vehicle";
import { VehicleType } from "./vehicleType";

export default class Truck extends Vehicle {

    public getType(): VehicleType {
        return VehicleType.TRUCK;
    }

    constructor(brand: string, model: string, year: number, value: number, mileage?: number) {
        super(brand, model, year, value, VehicleType.TRUCK, mileage);
    }

    
}