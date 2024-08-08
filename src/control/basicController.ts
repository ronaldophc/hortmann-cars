import Buyer from "../model/buyer";
import Car from "../model/car";
import Motorcycle from "../model/motorcycle";
import Sale from "../model/sale";
import Seller from "../model/seller";
import Truck from "../model/truck";
import PrimaryScreen from "../view/primaryScreen";
import BuyerController from "./buyerController";
import SaleController from "./saleController";
import SellerController from "./sellerController";
import VehiclesController from "./vehiclesController";

export default class BasicController {

    private primaryScreen: PrimaryScreen = new PrimaryScreen();

    public startSystem(): void {
        this.generateTest();
        this.primaryScreen.getFirstScreen();
    }

    public generateTest(): void {
        const car1 = new Car('Toyota', 'Corolla', 2020, 20000, 0);
        const car2 = new Car('Honda', 'Civic', 2019, 18000, 20000);

        const motorcycle1 = new Motorcycle('Yamaha', 'MT-07', 2021, 7000, 5000);
        const motorcycle2 = new Motorcycle('Kawasaki', 'Ninja 400', 2020, 6000, 8000);

        const truck1 = new Truck('Ford', 'F-150', 2018, 30000, 40000);
        const truck2 = new Truck('Chevrolet', 'Silverado', 2019, 35000, 30000);

        VehiclesController.registerNewVehicle(car1);
        VehiclesController.registerNewVehicle(car2);
        VehiclesController.registerNewVehicle(motorcycle1);
        VehiclesController.registerNewVehicle(motorcycle2);
        VehiclesController.registerNewVehicle(truck1);
        VehiclesController.registerNewVehicle(truck2);

        const buyer1 = new Buyer('John Doe', 25000);
        const buyer2 = new Buyer('Jane Smith', 30000);

        const seller1 = new Seller('Mary Johnson');
        const seller2 = new Seller('Paul Brown');

        const sale1 = new Sale(new Date(), seller1, car1, buyer1);
        const sale2 = new Sale(new Date(), seller2, motorcycle1, buyer2);
        const sale3 = new Sale(new Date(), seller1, truck1, buyer2);


        BuyerController.registerNewBuyer(buyer1);
        BuyerController.registerNewBuyer(buyer2);
        SellerController.registerNewSeller(seller1);
        SellerController.registerNewSeller(seller2);
        SaleController.registerNewSale(sale1);
        SaleController.registerNewSale(sale2);
        SaleController.registerNewSale(sale3);
    }

}