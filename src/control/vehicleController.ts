import DataCenter from "../db/dataCenter";
import Vehicle from "../model/vehicle";

export default class VehicleController {

    private static datacenter: DataCenter = DataCenter.getInstance();

    public static registerNewVehicle(vehicle: Vehicle): void {
        this.datacenter.addNewVehicle(vehicle);
    }

    public static listAllCars(): void {
        console.log(this.datacenter.getVehicles());
    }

    public static getVehicleById(id: number): Vehicle {
        return this.datacenter.getVehicleById(id);
    }
}