import Vehicle from "./vehicle";
import { VehicleType } from "./vehicleType";

export default class Motorcycle extends Vehicle {

    constructor(brand: string, model: string, year: number, value: number, mileage?: number) {
        super(brand, model, year, value, VehicleType.MOTORCYCLE, mileage);
    }

}