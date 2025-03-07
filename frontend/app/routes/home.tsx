import type { Route } from "./+types/home";
import { Welcome } from "../pages/welcome/welcome";
import Base from "~/pages/base/base";

export function meta({}: Route.MetaArgs) {
  return [
    { title: "React Router Teste" },
    { name: "Teste de Libs", content: "Bem vindo ao Site de Testes" },
  ];
}


export default function Home() {
  return <Welcome />;
}
