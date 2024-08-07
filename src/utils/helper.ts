import Buyer from "../model/buyer";
import PersonalError from "../model/personalError";
import { VehicleType } from "../model/vehicleType";

export default class Helper {
    private static currentId: number = 0;

    public static generateId(): number {
        return ++this.currentId;
    }

    public static canBuyerAfford(buyer: Buyer, value: number): boolean {
        if(buyer.getBalance() >= value) {
            return true;
        }
        console.log("O comprador " + buyer.getName() + " não tem dinheiro suficiente para comprar esse carro.");
        return false;
    }

    public static getVehicleType(type: string) {
        switch(type) {
            case "CARRO":
                return VehicleType.CAR;
            case "MOTO":
                return VehicleType.MOTORCYCLE;
            case "CAMINHAO":
                return VehicleType.TRUCK;
            default:
                throw new PersonalError("Tipo de veículo inválido.");
        }
    }
}