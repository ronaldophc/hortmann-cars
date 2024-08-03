import PrimaryScreen from "../view/primaryScreen";

export default class BasicController {

    private primaryScreen: PrimaryScreen = new PrimaryScreen();

    public startSystem(): void {
        this.primaryScreen.getFirstScreen();
    }

}