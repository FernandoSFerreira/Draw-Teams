import { defineConfig } from 'vite'
import customDomain from "vite-plugin-custom-domain";
import react from '@vitejs/plugin-react'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
      customDomain({
          // You can specify any number of domain names
          "127.0.0.1":  ["virtuallworld.com","ferreirasystems.com","localhost"],
          "138.219.76.100": ["virtuallworld.com","ferreirasystems.com"],
          "172.18.0.1": ["virtuallworld.com","ferreirasystems.com"]
      }),
      react()],
      server: {
        host: '0.0.0.0', // Isso permite que o Vite escute em todos os endereços disponíveis
      }
})
