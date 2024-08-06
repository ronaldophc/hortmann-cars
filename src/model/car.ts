import Vehicle from "./vehicle";
import { VehicleType } from "./vehicleType";

export default class Car extends Vehicle {

    constructor(brand: string, model: string, year: number, value: number, mileage: number) {
        super(brand, model, year, value, VehicleType.CAR, mileage);
    }

}