"use client";

import {Select} from "@radix-ui/react-select";
import {ModeToggle} from "../Mode-toggle/mode-toggle";
import SelectProject from "../Select-Project/Select-Project";
import type Project from "~/types/Project";

const projects: Project[] = [
  {
    id: 1,
    name: "Projeto Alpha",
    description: "Um projeto inovador para desenvolver novas tecnologias.",
  },
  {
    id: 2,
    name: "Projeto Beta",
    description: "Uma iniciativa focada em melhorar a eficiência operacional.",
  },
  {
    id: 3,
    name: "Projeto Gamma",
    description: "Exploração de soluções sustentáveis para o futuro.",
  },
];

export default function TopNavBar() {
  return (
    <div className=" w-full h-[10vh]">
      <div className="flex justify-evenly w-3/10 pt-2.5">
        <ModeToggle />
        <SelectProject projectArray={projects} />
      </div>
    </div>
  );
}
