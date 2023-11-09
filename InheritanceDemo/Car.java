public class Car extends Vehicle {
    int numberOfDoors;

    public Car(String brand, int year, int numberOfDoors) {
        super(brand, year);
        this.numberOfDoors = numberOfDoors;
    }

    public void start() {
        System.out.println("The car is starting.");
    }

    public void stop() {
        System.out.println("The car is stopping.");
    }
}
