import type { Route } from "./+types/home";
import { Welcome } from "../pages/welcome/welcome";
import Base from "~/pages/base/base";
import AllProjects from "~/pages/AllProjects/AllProjects";

export function meta({}: Route.MetaArgs) {
  return [
    { title: "React Router Teste" },
    { name: "Teste de Libs", content: "Bem vindo ao Site de Testes" },
  ];
}


export default function Home() {
  return <AllProjects />;
}
