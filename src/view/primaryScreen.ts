
import promptSync from "prompt-sync";
import Car from "../model/car";
import carController from "../control/carController";
import BuyerController from "../control/buyerController";
import Buyer from "../model/buyer";
import Seller from "../model/seller";
import SellerController from "../control/sellerController";

export default class PrimaryScreen {

    constructor() {
        
    }

    private prompt = promptSync();

    public getFirstScreen(): void {
        let showScreen: boolean = true;
        while(showScreen) {
            let choice = this.prompt("Escolha:\n1- Cadastrar carro\n2- Cadastrar vendedor\n3- Cadastrar comprador\n4- Cadastrar venda\n5- Listar carros\n6- Sair");
            //1 Cadastrar Carro
            //2 Cadastrar Vendedor
            //3 Cadastrar Comprador
            //4 Cadastras Venda
            //5 Listar Carros
            let name;
            switch(choice) {
                case '1':
                    const brand = this.prompt("Digite a marca do carro:\n");
                    const model = this.prompt("Digite o modelo do carro:\n");
                    const value = Number(this.prompt("Digite o valor do carro:\n"));
                    const year = Number(this.prompt("Digite o ano do carro:\n"));
                    let newCar = new Car(brand, model, year, value);

                    carController.registerNewCar(newCar);
                    carController.listAllCars();

                    break;
                case '2':
                    name = this.prompt("Digite o nome do vendedor:\n");
                    let seller = new Seller(name);
                    SellerController.registerNewSeller(seller);
                    SellerController.listAllSellers();
                    break;
                case '3':
                    name = this.prompt("Digite o nome do comprador:\n");
                    const money = Number(this.prompt("Digite o dinheiro que o Comprador tem:\n"));
                    let buyer = new Buyer(name, money);
                    BuyerController.registerNewBuyer(buyer);
                    BuyerController.listAllBuyers();
                    break;
                case '4':
                    
                    break;
                case '5':
                    carController.listAllCars();
                    break;
                case '6':
                    showScreen = false;
                    break;
            }
        }
    }
}