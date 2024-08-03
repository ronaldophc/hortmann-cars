import Helper from "../utils/helper";
import { Entity } from "./entity";
import { VehicleType } from "./vehicleType";

export default class Vehicle implements Entity {

    public id: number = Helper.generateId();
    public brand: string;
    public model: string;
    public year: number;
    public value: number;
    private type: VehicleType;

    constructor(brand: string, model: string, year: number, value: number, type: VehicleType) {
        this.type = type;
        this.brand = brand;
        this.model = model;
        this.year = year;
        this.value = value;
    }

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

    public getType(): VehicleType {
        return this.type;
    }
    

}