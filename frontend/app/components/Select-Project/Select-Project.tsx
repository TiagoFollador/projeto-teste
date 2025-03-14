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

interface Project {
  id: number;
  name: string;
  description: string;
}

interface SelectProjectProps {
  projectArray: Project[];
}

const SelectProject = ({projectArray}: SelectProjectProps) => {
  const [currentProject, setCurrentProject] = useState<Project>(
    projectArray[0]
  );

  return (
    <Select>
      <SelectTrigger className="w-[180px]">
        <SelectValue placeholder="Selecione um projeto" />
      </SelectTrigger>
      <SelectContent>
        <SelectGroup>
          <SelectLabel>{currentProject.name}</SelectLabel>

          {projectArray.map((project) => {
            return <SelectItem value={String(project.id)}>{project.name}</SelectItem>;
          })}
        </SelectGroup>
      </SelectContent>
    </Select>
  );
};

export default SelectProject;
