
import axios from "axios";

const API_BASE_URL = "http://127.0.0.1:8000/api";
const API_KEY ="vU6BhF23VjDIagNTSTUvrp1W8KsPuCeLy";


const UserService = {
  async registerUser(userData) {
    try {
      const response = await axios.post(`${API_BASE_URL}/v1/users`, userData, {
        headers: {
            Authorization: `Bearer ${API_KEY}`,

        }
      });
      console.log(response.data)
      return response.data;
    } catch (error) {
      console.error("Error registering user:", error);
      return { error: true, message: "Failed to register user." };
    }
  },

  async loginUser(userData) {
    try {
      const response = await axios.post(`${API_BASE_URL}/v1/auth`, userData,{
        headers: {
            Authorization: `Bearer ${API_KEY}`,

        }
      });
      console.log(response.data)
      return response.data;
    } catch (error) {
      console.error("Error logging in:", error);
      return { error: true, message: "Failed to log in." };
    }
  },
};





export default UserService;
