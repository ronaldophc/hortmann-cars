import DataCenter from "../db/dataCenter";
import Car from "../model/car";
import Motorcycle from "../model/motorcycle";
import Truck from "../model/truck";

export default class VehiclesController {
    private static datacenter: DataCenter = DataCenter.getInstance();

    public static registerNewVehicle(vehicle: Car | Truck | Motorcycle): void {
        this.datacenter.addNewVehicle(vehicle);
    }

    public static listAllCars(): void {
        console.log(this.datacenter.getCars());
    }

    public static listAllVehicles(): void {
        console.log(this.datacenter.getAllVehicles());
    }

    public static getVehicleById(id: number): Car | Truck | Motorcycle {
        try {
            return this.datacenter.getVehiclebyId(id);
        } catch (error: any) {
            console.log("Erro " + error.message);
            return error;
        }
    }

    public static listAllMotorcycles(): void {
        console.log(this.datacenter.getMotorcycles());
    }

    public static listAllTrucks(): void {
        console.log(this.datacenter.getTrucks());
    }

}
