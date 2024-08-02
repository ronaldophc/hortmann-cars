import DataCenter from "../db/dataCenter";
import Buyer from "../model/buyer";

export default class BuyerController {
    private static datacenter: DataCenter = new DataCenter();

    public static registerNewBuyer(buyer: Buyer) {
        this.datacenter.addNewBuyer(buyer);
    }

    public static listAllBuyers() {
        this.datacenter.getBuyers();
    }
}