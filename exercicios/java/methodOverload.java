import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class methodOverload {

    public static void main(String[] args) {

        List<String> names = new ArrayList<>();

        try (Scanner scanner = new Scanner(System.in)) {
            System.out.print("Enter de number of names: ");
            int namesCount = Integer.parseInt(scanner.nextLine());

            names = createNames(names, namesCount);

            showNames(names);
            showNames(names, false);
        } catch (NumberFormatException e) {
            e.printStackTrace();
        }

    }

    public static List<String> createNames(List<String> names, int namesCount) {
        for (int i = 0; i < namesCount; i++)
            names.add("Name " + i);
        return names;
    }

    public static void showNames(List<String> names) {
        System.out.println("\nName(s) with numbers:\n");
        for (String name : names)
            System.out.println(name);
    }

    public static void showNames(List<String> names, boolean withNumber) {
        if (withNumber)
            showNames(names);
        else {
            System.out.println("\nName(s) without numbers:\n");
            for (String name : names)
                System.out.println(name.substring(0, 4));
        }

    }
}
