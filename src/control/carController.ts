import DataCenter from "../db/dataCenter";
import Car from "../model/car";

export default class CarController {

    private static datacenter: DataCenter = new DataCenter();

    public static registerNewCar(car: Car): void {
        this.datacenter.addNewCar(car);
    }

    public static listAllCars(): void {
        console.log(this.datacenter.getCars());
    }
}