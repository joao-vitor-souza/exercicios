public class User {

    public String first_name;
    public String last_name;
    private String full_name;

    public User(String first_name, String last_name) {
        this.first_name = first_name;
        this.last_name = last_name;
    }

    public void setFullName() {
        this.full_name = this.first_name + " " + this.last_name;
    }

    public String getFullName() {
        return this.full_name;
    }

}
