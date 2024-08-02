export default class Car {

    constructor(public brand: string, public model: string, public year: number, public value: number) {
        this.brand = brand;
        this.model = model;
        this.year = year;
        this.value = value;
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