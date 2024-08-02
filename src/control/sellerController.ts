import DataCenter from "../db/dataCenter";
import Seller from "../model/seller";

export default class SellerController {
    private static datacenter: DataCenter = new DataCenter();

    public static registerNewSeller(Seller: Seller) {
        this.datacenter.addNewSeller(Seller);
    }

    public static listAllSellers() {
        this.datacenter.getSellers();
    }
}