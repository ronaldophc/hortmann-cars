import Vehicle from "../model/vehicle";
import { VehicleType } from "../model/vehicleType";

class TestVehicle extends Vehicle {
  constructor(
    brand: string,
    model: string,
    year: number,
    value: number,
    type: VehicleType,
    mileage?: number
  ) {
    super(brand, model, year, value, type, mileage);
  }

  public getType(): VehicleType {
    return this.type;
  }
}

describe("TestVehicle", () => {
  let vehicle: TestVehicle;

  beforeEach(() => {
    vehicle = new TestVehicle(
      "TestBrand",
      "TestModel",
      2020,
      10000,
      VehicleType.CAR,
      5000
    );
  });

  test("cria uma instancia do TestVehicle", () => {
    expect(vehicle).toBeInstanceOf(TestVehicle);
  });

  test("Verificar se os gatters retorna os valores corretos", () => {
    expect(vehicle.getBrand()).toBe("TestBrand");
    expect(vehicle.getModel()).toBe("TestModel");
    expect(vehicle.getYear()).toBe(2020);
    expect(vehicle.getValue()).toBe(10000);
    expect(vehicle.getType()).toBe(VehicleType.CAR);
  });

  test("setters precisa atualizar os valores corretamente", () => {
    vehicle.setBrand("NewBrand");
    vehicle.setModel("NewModel");
    vehicle.setYear(2021);
    vehicle.setValue(15000);

    expect(vehicle.getBrand()).toBe("NewBrand");
    expect(vehicle.getModel()).toBe("NewModel");
    expect(vehicle.getYear()).toBe(2021);
    expect(vehicle.getValue()).toBe(15000);
  });

  test("getId precisa retornar um valor do tipo number", () => {
    expect(typeof vehicle.getId()).toBe("number");
  });
});
