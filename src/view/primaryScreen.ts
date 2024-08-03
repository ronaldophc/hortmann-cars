
import promptSync from "prompt-sync";
import BuyerController from "../control/buyerController";
import Buyer from "../model/buyer";
import Seller from "../model/seller";
import SellerController from "../control/sellerController";
import Sale from "../model/sale";
import Helper from "../utils/helper";
import DataCenter from "../db/dataCenter";
import SaleController from "../control/saleController";
import VehicleController from "../control/vehicleController";
import Vehicle from "../model/vehicle";
import { VehicleType } from "../model/vehicleType";

export default class PrimaryScreen {

    constructor() {

    }

    private prompt = promptSync();


    public getFirstScreen(): void {
        let showScreen: boolean = true;
        while(showScreen) {
            this.generateTests();
            let choice = this.prompt("Escolha:\n1- Cadastrar carro\n2- Cadastrar vendedor\n3- Cadastrar comprador\n4- Cadastrar venda\n5- Listar carros\n6- Sair");
            //1 Cadastrar Carro
            //2 Cadastrar Vendedor
            //3 Cadastrar Comprador
            //4 Cadastras Venda
            //5 Listar Carros
            let name;
            let seller;
            let buyer;
            switch(choice) {
                case '1':
                    const brand = this.prompt("Digite a marca do carro:\n");
                    const model = this.prompt("Digite o modelo do carro:\n");
                    const value = Number(this.prompt("Digite o valor do carro:\n"));
                    const year = Number(this.prompt("Digite o ano do carro:\n"));
                    let type = this.prompt("Digite o tipo do carro:(CAR, MOTORCYCLE OR TRUCK)\n");
                    let vtype = Helper.getVehicleType(type);
                    let newVehicle = new Vehicle(brand, model, year, value, vtype);

                    VehicleController.registerNewVehicle(newVehicle);
                    VehicleController.listAllCars();

                    break;
                case '2':
                    name = this.prompt("Digite o nome do vendedor:\n");
                    seller = new Seller(name);
                    SellerController.registerNewSeller(seller);
                    SellerController.listAllSellers();
                    break;
                case '3':
                    name = this.prompt("Digite o nome do comprador:\n");
                    const money = Number(this.prompt("Digite o dinheiro que o Comprador tem:\n"));
                    buyer = new Buyer(name, money);
                    BuyerController.registerNewBuyer(buyer);
                    BuyerController.listAllBuyers();
                    break;
                case '4':
                    console.log(VehicleController.listAllCars());
                    let id = Number(this.prompt("Digite o id do carro:\n"));
                    let car = VehicleController.getVehicleById(id);
                    console.log(car);

                    console.log(SellerController.listAllSellers());
                    let sellerName = Number(this.prompt("Digite o id do vendedor:\n"));
                    seller = SellerController.getSellerById(sellerName);
                    console.log(seller);

                    console.log(BuyerController.listAllBuyers());
                    let buyerName = Number(this.prompt("Digite o id do comprador:\n"));
                    buyer = BuyerController.getBuyerById(buyerName);
                    console.log(buyer);
                    
                    let sale = new Sale(new Date(), seller, car, buyer);
                    console.log(sale.infoPurchase());
                    console.log('-----------------------');
                    console.log(sale);
                    break;
                case '5':
                    VehicleController.listAllCars();
                    break;
                case '6':
                    showScreen = false;
                    break;
            }
        }
    }

    public generateTests(): void {
        let newCar = new Vehicle("Chevrolet", "Onix", 2021, 60000, VehicleType.CAR);
        VehicleController.registerNewVehicle(newCar);
        let newCar2 = new Vehicle("Fiat", "Uno", 2021, 30000, VehicleType.CAR);
        VehicleController.registerNewVehicle(newCar2);
        let newCar3 = new Vehicle("Ford", "Ka", 2021, 40000, VehicleType.CAR);
        VehicleController.registerNewVehicle(newCar3);

        let newSeller = new Seller("João");
        SellerController.registerNewSeller(newSeller);
        let newSeller2 = new Seller("Maria");
        SellerController.registerNewSeller(newSeller2);
        let newSeller3 = new Seller("José");
        SellerController.registerNewSeller(newSeller3);

        let newBuyer = new Buyer("Pedro", 100000);
        BuyerController.registerNewBuyer(newBuyer);
        let newBuyer2 = new Buyer("Paula", 10000);
        BuyerController.registerNewBuyer(newBuyer2);
        let newBuyer3 = new Buyer("Lucas", 80000);
        BuyerController.registerNewBuyer(newBuyer3);

        if(Helper.canBuyerAfford(newBuyer, newCar.getValue())) {
            let sale = new Sale(new Date(), newSeller, newCar, newBuyer);
            SaleController.registerNewSale(sale);
            console.log(sale.infoPurchase());
        }

        if(Helper.canBuyerAfford(newBuyer2, newCar2.getValue())) {
            let sale2 = new Sale(new Date(), newSeller2, newCar2, newBuyer2);
            SaleController.registerNewSale(sale2);
            console.log(sale2.infoPurchase());
        }

        if(Helper.canBuyerAfford(newBuyer3, newCar3.getValue())) {
            let sale3 = new Sale(new Date(), newSeller3, newCar3, newBuyer3);
            SaleController.registerNewSale(sale3);
            console.log(sale3.infoPurchase());
        }
        
        DataCenter.getInstance().printAll();
    }
}