import Buyer from "../model/buyer";
import Car from "../model/car";
import Sale from "../model/sale";
import Seller from "../model/seller";
import Vehicle from "../model/vehicle";

class TestSale extends Sale {
  constructor(date: Date, seller: Seller, vehicle: Vehicle, buyer: Buyer) {
    super(date, seller, vehicle, buyer);
  }

}

describe('Sale', () => {
  let sale: Sale;
  let buyer: Buyer;
  let seller: Seller;
  let vehicle: Vehicle;

  beforeEach(() => {
    buyer = new Buyer("Ronaldo", 50000);
    seller = new Seller("Messi");
    vehicle = new Car("Peugeot", "208", 2020, 10000, 5000);

    sale = new Sale(new Date(), seller, vehicle, buyer);
  });

  test('should correctly initialize a sale', () => {
    expect(sale.getSaleValue()).toBe(10000);
    expect(sale.getComission()).toBe(200); // 2% of 10000
    expect(sale.getSeller().getBalance()).toBe(200);
  });
});