import DataCenter from "../db/dataCenter";
import Seller from "../model/seller";

export default class SellerController {
    private static datacenter: DataCenter = DataCenter.getInstance();

    public static registerNewSeller(Seller: Seller) {
        this.datacenter.addNewSeller(Seller);
    }

    public static listAllSellers() {
        return this.datacenter.getSellers();
    }

    public static getSellerById(id: number): Seller {
        return this.datacenter.getSellerById(id);
    }
}
