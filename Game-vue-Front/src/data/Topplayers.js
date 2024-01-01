// src/services/PlayerService.js

import axios from "axios";

const API_BASE_URL = "http://127.0.0.1:8000/api";
const API_KEY ="vU6BhF23VjDIagNTSTUvrp1W8KsPuCeLy";
const PlayerService = {
  async getTopPlayers() {
    try {
      const response = await axios.get(`${API_BASE_URL}/v1/top-players`, {
        headers: {
          Authorization: `Bearer ${API_KEY}`,
        },
      });
      console.log(response.data);
      return response.data;
    } catch (error) {
      console.error("Error fetching top players:", error);
      return []; 
    }
  },
};

export default PlayerService;
