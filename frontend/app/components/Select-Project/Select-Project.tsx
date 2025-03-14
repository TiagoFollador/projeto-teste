"use client";

import {useState} from "react";
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectLabel,
  SelectTrigger,
  SelectValue,
} from "../ui/select";
import type Project from "~/types/Project";


interface SelectProjectProps {
  projectArray: Project[];
}

const SelectProject = ({projectArray}: SelectProjectProps) => {
  const [currentProject, setCurrentProject] = useState<Project>(
    projectArray[0]
  );

  const handleOnChange = (id: string) => {
    const projectFind = projectArray.find(
      (project) => project.id === Number(id)
    );

    if (projectFind) {
      setCurrentProject(projectFind);
    }
  } 

  return (
    <Select onValueChange={(id) => handleOnChange(id)
    }>
      <SelectTrigger className="w-[180px]">
        <SelectValue placeholder="Selecione um projeto" />
      </SelectTrigger>
      <SelectContent>
        <SelectGroup>
          <SelectLabel>Projetos</SelectLabel>

          {projectArray.map((project) => {
            return <SelectItem value={String(project.id)}>{project.name}</SelectItem>;
          })}
        </SelectGroup>
      </SelectContent>
    </Select>
  );
};

export default SelectProject;
