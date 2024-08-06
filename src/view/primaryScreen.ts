import promptSync from "prompt-sync";
import BuyerController from "../control/buyerController";
import Buyer from "../model/buyer";
import Seller from "../model/seller";
import SellerController from "../control/sellerController";
import Sale from "../model/sale";
import Helper from "../utils/helper";
import { VehicleType } from "../model/vehicleType";
import Motorcycle from "../model/motorcycle";
import Truck from "../model/truck";
import Car from "../model/car";
import VehiclesController from "../control/vehiclesController";

export default class PrimaryScreen {
    private prompt = promptSync();

    private static readonly MENU_OPTIONS = {
        REGISTER_CAR: "1",
        REGISTER_SELLER: "2",
        REGISTER_BUYER: "3",
        REGISTER_SALE: "4",
        LISTS: "5",
        EXIT: "6",
    };

    private static readonly LIST_MENU_OPTIONS = {
        LIST_CARS: "1",
        LIST_TRUCKS: "2",
        LIST_MOTORCYCLES: "3",
        LIST_SELLERS: "4",
        LIST_BUYERS: "5",
        BACK: "6",
    };

    public getFirstScreen(): void {
        let showScreen = true;
        while (showScreen) {
            const choice = this.promptMenu();
            showScreen = this.handleMenuChoice(choice);
        }
    }

    private promptMenu(): string {
        return this.prompt(
            "Escolha:\n1- Cadastrar carro\n2- Cadastrar vendedor\n3- Cadastrar comprador\n4- Cadastrar venda\n5- Listas\n6- Sair\n"
        );
    }

    private promptListMenu(): string {
        return this.prompt(
            "Escolha:\n1- Listar carros\n2- Listar caminhões\n3- Listar motos\n4- Listar vendedores\n5- Listar compradores\n6- Voltar\n"
        );
    }

    private handleMenuChoice(choice: string): boolean {
        switch (choice) {
            case PrimaryScreen.MENU_OPTIONS.REGISTER_CAR:
                this.registerCar();
                break;
            case PrimaryScreen.MENU_OPTIONS.REGISTER_SELLER:
                this.registerSeller();
                break;
            case PrimaryScreen.MENU_OPTIONS.REGISTER_BUYER:
                this.registerBuyer();
                break;
            case PrimaryScreen.MENU_OPTIONS.REGISTER_SALE:
                this.registerSale();
                break;
            case PrimaryScreen.MENU_OPTIONS.LISTS:
                this.handleListMenu();
                break;
            case PrimaryScreen.MENU_OPTIONS.EXIT:
                return false;
            default:
                console.log("Opção inválida. Tente novamente.");
        }
        return true;
    }

    private handleListMenu(): void {
        let showListMenu = true;
        while (showListMenu) {
            const choice = this.promptListMenu();
            showListMenu = this.handleListMenuChoice(choice);
        }
    }

    private handleListMenuChoice(choice: string): boolean {
        switch (choice) {
            case PrimaryScreen.LIST_MENU_OPTIONS.LIST_CARS:
                VehiclesController.listAllCars();
                break;
            case PrimaryScreen.LIST_MENU_OPTIONS.LIST_TRUCKS:
                VehiclesController.listAllTrucks();
                break;
            case PrimaryScreen.LIST_MENU_OPTIONS.LIST_MOTORCYCLES:
                VehiclesController.listAllMotorcycles();
                break;
            case PrimaryScreen.LIST_MENU_OPTIONS.LIST_SELLERS:
                SellerController.listAllSellers();
                break;
            case PrimaryScreen.LIST_MENU_OPTIONS.LIST_BUYERS:
                BuyerController.listAllBuyers();
                break;
            case PrimaryScreen.LIST_MENU_OPTIONS.BACK:
                return false;
            default:
                console.log("Opção inválida. Tente novamente.");
        }
        return true;
    }

    private registerCar(): void {
        const brand = this.prompt("Digite a marca do carro:\n");
        const model = this.prompt("Digite o modelo do carro:\n");
        const value = Number(this.prompt("Digite o valor do carro:\n"));
        const year = Number(this.prompt("Digite o ano do carro:\n"));
        const type = this.prompt(
            "Digite o tipo do carro:(CARRO, MOTO OU CAMINHAO)\n"
        );
        const mileage = Number(
            this.prompt("Digite a quilometragem do carro:(Não obrigatório)\n")
        );
        let vtype;
        try {
            vtype = Helper.getVehicleType(type);
        } catch (error: any) {
            console.log("Erro " + error.message);
            return;
        }
        let newVehicle;
        if (vtype === VehicleType.MOTORCYCLE) {
            newVehicle = new Motorcycle(
                brand,
                model,
                year,
                value,
                mileage || 0
            );
        }
        if (vtype === VehicleType.TRUCK) {
            newVehicle = new Truck(
                brand,
                model,
                year,
                value,
                mileage || 0
            );
        }
        if (vtype === VehicleType.CAR) {
            newVehicle = new Car(
                brand,
                model,
                year,
                value,
                mileage || 0
            );
        }
        if (newVehicle) {
            VehiclesController.registerNewVehicle(newVehicle);
            console.log(newVehicle);
            VehiclesController.listAllVehicles();
        }
    }

    private registerSeller(): void {
        const name = this.prompt("Digite o nome do vendedor:\n");
        const seller = new Seller(name);
        SellerController.registerNewSeller(seller);
        SellerController.listAllSellers();
    }

    private registerBuyer(): void {
        const name = this.prompt("Digite o nome do comprador:\n");
        const money = Number(
            this.prompt("Digite o dinheiro que o Comprador tem:\n")
        );
        const buyer = new Buyer(name, money);
        BuyerController.registerNewBuyer(buyer);
        BuyerController.listAllBuyers();
    }

    private registerSale(): void {
        console.log(VehiclesController.listAllCars());
        const carId = Number(this.prompt("Digite o id do carro:\n"));
        const car = VehiclesController.getVehicleById(carId);
        console.log(car);

        console.log(SellerController.listAllSellers());
        const sellerId = Number(this.prompt("Digite o id do vendedor:\n"));
        const seller = SellerController.getSellerById(sellerId);
        console.log(seller);

        console.log(BuyerController.listAllBuyers());
        const buyerId = Number(this.prompt("Digite o id do comprador:\n"));
        const buyer = BuyerController.getBuyerById(buyerId);
        console.log(buyer);

        const sale = new Sale(new Date(), seller, car, buyer);
        console.log(sale.infoPurchase());
        console.log("-----------------------");
        console.log(sale);
    }
}
