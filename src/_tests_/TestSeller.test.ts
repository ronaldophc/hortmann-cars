import Seller from "../model/seller";

describe('Seller', () => {
  let seller: Seller;

  beforeEach(() => {
    seller = new Seller('John Doe');
  });

  test('should initialize with a comission of 0', () => {
    expect(seller.getBalance()).toBe(0);
  });

  test('getBalance should return the current comission', () => {
    seller.setBalance(100);
    expect(seller.getBalance()).toBe(100);
  });

  test('setBalance should correctly update the comission', () => {
    seller.setBalance(200);
    expect(seller.getBalance()).toBe(200);
  });

  test('describe should return a correct description string', () => {
    const description = seller.describe();
    expect(description).toContain('John Doe');
    expect(description).toContain('Comissão: 0'); // Assuming the Person.describe() includes the name.
  });
});