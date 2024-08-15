import DataCenter from "../db/dataCenter";
import Buyer from "../model/buyer";
import Sale from "../model/sale";
import Seller from "../model/seller";
import Vehicle from "../model/vehicle";

export default class SaleController {
    private static datacenter: DataCenter = DataCenter.getInstance();

    public static createNewSale(seller: Seller, buyer: Buyer, vehicle: Vehicle) {
        return new Sale(new Date(), seller, vehicle, buyer);
    }

    public static registerNewSale(sale: Sale) {
        this.datacenter.addNewSale(sale);
    }

    public static listAllSales(): Sale[] {
        return this.datacenter.getSales();
    }

    public static getSaleById(id: number): Sale {
        return this.datacenter.getSaleById(id);
    }
}