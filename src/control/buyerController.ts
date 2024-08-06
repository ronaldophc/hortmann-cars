import DataCenter from "../db/dataCenter";
import Buyer from "../model/buyer";

export default class BuyerController {
    private static datacenter: DataCenter = DataCenter.getInstance();

    public static registerNewBuyer(buyer: Buyer) {
        this.datacenter.addNewBuyer(buyer);
    }

    public static listAllBuyers() {
        console.log(this.datacenter.getBuyers());
    }

    public static getBuyerById(id: number): Buyer {
        return this.datacenter.getBuyers().find(buyer => buyer.getId() === id) as Buyer;
    }
}