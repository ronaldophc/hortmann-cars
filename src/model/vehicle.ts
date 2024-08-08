import Helper from "../utils/helper";
import { Entity } from "./entity";
import { VehicleType } from "./vehicleType";

export default abstract class Vehicle implements Entity {

    public id: number = Helper.generateId();
    public brand: string;
    public model: string;
    public year: number;
    public value: number;
    private type: VehicleType;
    private mileage;

    constructor(brand: string, model: string, year: number, value: number, type: VehicleType, mileage?: number) {
        this.type = type;
        this.brand = brand;
        this.model = model;
        this.year = year;
        this.value = value;
        this.mileage = mileage;
    }

    public abstract getType(): VehicleType;

    public getId(): number {
        return this.id;
    }

    public getBrand(): string {
        return this.brand;
    }

    public getModel(): string {
        return this.model;
    }

    public getYear(): number {
        return this.year;
    }

    public getValue(): number {
        return this.value;
    }

    public setBrand(brand: string): void {
        this.brand = brand;
    }

    public setModel(model: string): void {
        this.model = model;
    }

    public setYear(year: number): void {
        this.year = year;
    }

    public setValue(value: number): void {
        this.value = value;
    }


}