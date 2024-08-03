import DataCenter from "../db/dataCenter";
import Sale from "../model/sale";

export default class SaleController {
    private static datacenter: DataCenter = DataCenter.getInstance();

    public static registerNewSale(sale: Sale) {
        this.datacenter.addNewSale(sale);
    }

    public static listAllSales() {
        this.datacenter.getSales();
    }
}